<?php


namespace WCS\TerrainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WCS\TerrainBundle\Entity\Terrain;


class CreateTerrainCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('wcs:terrain:create')
            ->setDescription('Create a terrain.')
            ->setDefinition(array(
                new InputArgument('name', InputArgument::REQUIRED, 'The name'),
                new InputArgument('latitude', InputArgument::REQUIRED, 'The latitude'),
                new InputArgument('longitude', InputArgument::REQUIRED, 'The longitude'),
            ))
            ->setHelp(<<<EOT
The <info>wcs:terrain:create</info> command creates a terrain:
EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name   = $input->getArgument('name');
        $latitude      = $input->getArgument('latitude');
        $longitude   = $input->getArgument('longitude');

        $terrain = new Terrain();
        $terrain->setName($name);
        $terrain->setLatitude($latitude);
        $terrain->setLongitude($longitude);
        $em = $this->getContainer()->get('doctrine')->getManager();
        $em->persist($terrain);
        $em->flush();

        $output->writeln(sprintf('Created terrain <comment>%s</comment>', $name));
    }

    /**
     * @see Command
     */
    /*protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('username')) {
            $username = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a username:',
                function($username) {
                    if (empty($username)) {
                        throw new \Exception('Username can not be empty');
                    }

                    return $username;
                }
            );
            $input->setArgument('username', $username);
        }

        if (!$input->getArgument('email')) {
            $email = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose an email:',
                function($email) {
                    if (empty($email)) {
                        throw new \Exception('Email can not be empty');
                    }

                    return $email;
                }
            );
            $input->setArgument('email', $email);
        }

        if (!$input->getArgument('password')) {
            $password = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a password:',
                function($password) {
                    if (empty($password)) {
                        throw new \Exception('Password can not be empty');
                    }

                    return $password;
                }
            );
            $input->setArgument('password', $password);
        }
    }*/
}
